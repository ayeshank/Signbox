# Tree Traversal - In C++
Traversal is a process to visit all the nodes of a tree and may print their values too. Because, all nodes are connected via edges (links) we always start from the root (head) node. That is, we cannot randomly access a node in a tree. There are three ways which we use to traverse a tree
*In-order Traversal
*Pre-order Traversal
*Post-order Traversal

> Lets consider the tree of numbers below :
![alt text](https://www.techiedelight.com/wp-content/uploads/Binary-Tree-3.png "Binary Tree Traversal")

> **We will implement a code to traverse the tree shown above**

## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

## Creating a Structure

We will create a structure **struct** to implement the above tree.

```
struct Node 
{ 
    int data; 
    struct Node* left, *right; 
    Node(int data) 
    { 
        this->data = data; 
        left = right = NULL; 
    } 
}; 
```
The binary tree node has data, pointer to left child and a pointer to right child. The struct get us an idea that what attributes will use throughout the program.

## Creating an Inorder Function (Left-Root-Right)

In this traversal method, the left subtree is visited first, then the root and later the right sub-tree.
```
void Inorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    Inorder(node->left); 
    cout << node->data << " "; 
    Inorder(node->right); 
} 

```
*The **Inorder(node->left)** will place the node data to left side or first recur on left child.
*The **cout << node->data << " "** will print the data or value of node.
*The **Inorder(node->right)** will place the node data to right side or recur on right child.



## Creating an Preorder Function (Root-Left-Right)

In this traversal method, the root node is visited first, then the left subtree and finally the right subtree.

```
void Preorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    cout << node->data << " ";
    Preorder(node->left);  
    Preorder(node->right); 
}

```
*The **cout << node->data << " "** will print the data or value of node.
*The **Preorder(node->left)** will place the node data to left side or first recur on left child.
*The **Preorder(node->right)** will place the node data to right side or recur on right child.

## Creating an Postorder Function (Left-Right-Root)

In this traversal method, the root node is visited last, hence the name. First we traverse the left subtree, then the right subtree and finally the root node.

```
void Postorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    Postorder(node->left); 
    Postorder(node->right); 
    cout << node->data << " "; 
} 
```
*The **Postorder(node->left)** will place the node data to left side or first recur on left child.
*The **Postorder(node->right)** will place the node data to right side or recur on right child.
*The **cout << node->data << " "** will print the data or value of node.

> **The points mentioned above sequentially as each of theorder functions will process.**
## Main Function

The int main() function will create the object for the structure root and that will be the first or top most node of the tree.
```
int main() 
{ 
    struct Node *root  = new Node(1); 
    root->left         = new Node(2); 
    root->right        = new Node(3); 
    root->left->left   = new Node(4); 
    root->left->right  = new Node(5);
    root->right->left  = new Node(6);
    root->right->right = new Node(7);
    cout << "\nInorder traversal : "; Inorder(root);  
    cout << "\nPreorder traversal : "; Preorder(root); 
    cout << "\nPostorder traversal : "; Postorder(root); 
    return 0; 
} 
```
* **root->left  = new Node(2)** create the another node to the  left of the root node.
* **root->right = new Node(3)** create the another node to the  right of the root node.
* **root->left->left  = new Node(4)** create the another node to the  left of the left root node.
* **root->left->right = new Node(5)** create the another node to the  right of the left root node.

and similarly other node will be inserted.

## Conclusion
The above implementation of the tree traversal structure allow to insert the node according to the desire of the user and traverse them according to each node.

The output of the above code will look like this:

```
Inorder traversal : 4 2 5 1 6 3 7 
Preorder traversal : 1 2 4 5 3 6 7 
Postorder traversal : 4 5 2 6 7 3 1 
```
